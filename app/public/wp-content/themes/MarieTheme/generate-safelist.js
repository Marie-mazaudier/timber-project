const fs = require("fs");
const path = require("path");

// Dossiers à scanner
const directories = ["./templates", "./"];

// Regex pour capturer les classes CSS
const classRegex = /class=["']([^"']*)["']/g;

// Fonction pour scanner les fichiers
function getFiles(dir, fileList = []) {
  const files = fs.readdirSync(dir);
  files.forEach((file) => {
    const filePath = path.join(dir, file);
    const stat = fs.statSync(filePath);
    if (stat.isDirectory()) {
      getFiles(filePath, fileList);
    } else if (file.endsWith(".twig") || file.endsWith(".php")) {
      fileList.push(filePath);
    }
  });
  return fileList;
}

// Extraction des classes
function extractClasses(files) {
  const classSet = new Set();
  files.forEach((file) => {
    const content = fs.readFileSync(file, "utf8");
    let match;
    while ((match = classRegex.exec(content)) !== null) {
      match[1].split(" ").forEach((cls) => classSet.add(cls));
    }
  });
  return Array.from(classSet);
}

// Génération du safelist.json
function generateSafelist() {
  const files = getFiles("./");
  const classes = extractClasses(files);

  const safelist = classes.map((cls) => {
    if (cls.startsWith("bg-[")) {
      return { pattern: cls.replace(/([\[\]])/g, "\\$1") };
    }
    return cls;
  });

  fs.writeFileSync("safelist.json", JSON.stringify(safelist, null, 2));
  console.log("✅ Safelist généré avec succès !");
}

generateSafelist();

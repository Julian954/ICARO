let fileInput = document.getElementById("file-input");
let fileList = document.getElementById("files-list");
let numOfFiles = document.getElementById("num-of-files");

console.log("Hola");
fileInput.addEventListener("change", () => {
  fileList.innerHTML = "";
  numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

  for (i of fileInput.files) {
    let reader = new FileReader();
    let listItem = document.createElement("li");
    let fileName = i.name;
    let fileSize = (i.size / 1024).toFixed(1);
    let fileExtension = fileName.substring(fileName.length - 3);
    if (fileSize < 1024) {
      if (
        fileExtension == "pdf" ||
        fileExtension == "docx" ||
        fileExtension == "zip" ||
        fileExtension == "xlsx"
      ) {
        listItem.innerHTML = `<p>${fileName} (${fileSize} KB)</p>`;
      } else {
        listItem.innerHTML = `<p>${fileName} (${fileSize} KB) (Formato No Valido)</p>`;
      }
      
    } else if (fileSize >= 20480) {
      fileSize = (fileSize / 1024).toFixed(1);
      if (fileExtension == "pdf" || fileExtension == "docx" || fileExtension == "zip" || fileExtension == "xlsx") {
        listItem.innerHTML = `<p>${fileName} (${fileSize} MB) (Tamaña superado)</p>`;
      } else {
        listItem.innerHTML = `<p>${fileName} (${fileSize} MB) (Tamaña superado) (Formato No Valido)</p>`;
      }
    }
    else {
      fileSize = (fileSize / 1024).toFixed(1);
      if (
        fileExtension == "pdf" ||
        fileExtension == "docx" ||
        fileExtension == "zip" ||
        fileExtension == "xlsx"
      ) {
        listItem.innerHTML = `<p>${fileName} (${fileSize} MB) </p>`;
      } else {
        listItem.innerHTML = `<p>${fileName} (${fileSize} MB) (Formato No Valido)</p>`;
      }
    }
    fileList.appendChild(listItem);
  }
});

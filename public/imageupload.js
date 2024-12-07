function applyDnDFile(el) {
    const beforeUploadEl = el.querySelector(".before-upload");
    const afterUploadEl = el.querySelector(".after-upload");
    const imagePreview = el.querySelector(".after-upload img"); // Corrected selector
    const inputFile = el.querySelector("input");
    const inputFileName = el.querySelector("#file_name");
    const file_name_input = document.getElementById("file_name_input");
    const clearBtn = el.querySelector(".after-upload .clear-btn");

    function showImagePreview(img) {
        if (img) {
            console.log(img)
            if (img.type.split("/")[0] == "image") {
                const blobUrl = URL.createObjectURL(img);
                imagePreview.src = blobUrl;
            } else {
                imagePreview.src = "/document.svg"
            }
            inputFileName.innerHTML = "File: " + img.name;
            file_name_input.value = img.name;
            afterUploadEl.style.display = "block";
            beforeUploadEl.style.display = "none";
        }
    }

    beforeUploadEl.addEventListener("click", (e) => {
        e.preventDefault();
        inputFile.click();
    });

    inputFile.addEventListener("change", (e) => {
        e.preventDefault();
        inputFile.files = e.files;
        showImagePreview(e.target.files[0]);
    });

    clearBtn.addEventListener("click", (e) => {
        inputFileName.innerHTML = "";
        inputFile.files = null
        file_name_input.value = "";
        afterUploadEl.style.display = "none";
        beforeUploadEl.style.display = "flex";
    });

    beforeUploadEl.addEventListener("dragover", (e) => {
        e.preventDefault();
        el.classList.add("active");
    });

    beforeUploadEl.addEventListener("dragleave", (e) => {
        e.preventDefault();
        el.classList.remove("active");
    });

    beforeUploadEl.addEventListener("drop", (e) => {
        e.preventDefault();
        el.classList.remove("active");
        inputFile.files = e.files;
        showImagePreview(e.dataTransfer.files[0]);
    });
}

applyDnDFile(document.querySelector(".file-dnd"));

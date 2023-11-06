FilePond.registerPlugin(FilePondPluginImagePreview);

const images = document.querySelectorAll(".img-filepond-preview");
const files = document.querySelectorAll(".file-filepond-preview");

images.forEach((image) =>
    FilePond.create(image, {
        allowImagePreview: true,
        allowFileEncode: false,
        allowImageCrop: true,
        maxFileSize: "10MB",
        acceptedFileTypes: [
            "image/png",
            "image/jpg",
            "image/jpeg",
            "image/svg",
        ],
        fileValidateTypeDetectType: (source, type) => {
            new Promise((resolve, reject) => {
                resolve(type);
            });
        },
        storeAsFile: true,
        imageCropAspectRatio: "1:1",
    })
);

files.forEach((file) =>
    FilePond.create(file, {
        allowFileEncode: false,
        maxFileSize: "10MB",
        acceptedFileTypes: [
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "application/vnd.ms-excel",
        ],
        fileValidateTypeDetectType: (source, type) => {
            new Promise((resolve, reject) => {
                resolve(type);
            });
        },
        storeAsFile: true,
    })
);

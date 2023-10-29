FilePond.registerPlugin(FilePondPluginImagePreview);

const images = document.querySelectorAll(".img-filepond-preview");

images.forEach((image) =>
    FilePond.create(image, {
        allowImagePreview: true,
        allowFileEncode: false,
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

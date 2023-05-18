(function() {

    addEventListener("trix-attachment-add", function(event) {
        const endpoint = document.getElementById(event.srcElement.id).getAttribute('data-upload') ?? false;
        if (!endpoint) {
            alert("No endpoint specified for trix-attachment-add event. Please add data-upload attribute to trix-editor element.");
            event.preventDefault();
        }
        if (event.attachment.file) {
            uploadFileAttachment(event.attachment, endpoint)
        }
    })

    function uploadFileAttachment(attachment, endpoint) {
        uploadFile(attachment.file, setProgress, setAttributes, endpoint)

        function setProgress(progress) {
            attachment.setUploadProgress(progress)
        }

        function setAttributes(attributes) {
            attachment.setAttributes(attributes)
        }
    }

    function uploadFile(file, progressCallback, successCallback, endpoint) {
        var key = createStorageKey(file)
        var formData = createFormData(key, file)
        var xhr = new XMLHttpRequest()

        xhr.open("POST", endpoint, true)

        xhr.upload.addEventListener("progress", function(event) {
            var progress = event.loaded / event.total * 100
            progressCallback(progress)
        })

        xhr.addEventListener("load", function(event) {
            if (xhr.status == 200) {
                const path = xhr.response;
                var attributes = {
                    url: path,
                    href: path + "?content-disposition=attachment"
                }
                successCallback(attributes)
            }
        })

        xhr.send(formData)
    }

    function createStorageKey(file) {
        var date = new Date()
        var day = date.toISOString().slice(0,10)
        var name = date.getTime() + "-" + file.name
        return [ "tmp", day, name ].join("/")
    }

    function createFormData(key, file) {
        var data = new FormData()
        data.append("key", key)
        data.append("Content-Type", file.type)
        data.append("file", file)
        return data
    }
})();
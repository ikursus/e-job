<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel OCR with Google Vision</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Google Vision OCR - Laravel 12</h4>
                    </div>
                    <div class="card-body">
                        <form id="ocrForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary w-100" onclick="processImage()">
                                        Extract All Text
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success w-100" onclick="extractFormData()">
                                        Extract Form Fields
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div id="loading" class="text-center mt-3" style="display: none;">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Processing...</span>
                            </div>
                            <p>Processing image...</p>
                        </div>

                        <div id="results" class="mt-4" style="display: none;">
                            <h5>Results:</h5>
                            <div id="extracted-fields" class="mb-3"></div>
                            <div id="full-text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set up axios CSRF token
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function showLoading() {
            document.getElementById('loading').style.display = 'block';
            document.getElementById('results').style.display = 'none';
        }

        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }

        function displayResults(data) {
            const resultsDiv = document.getElementById('results');
            const fieldsDiv = document.getElementById('extracted-fields');
            const textDiv = document.getElementById('full-text');

            if (data.fields || data.data?.extracted_fields) {
                const fields = data.fields || data.data.extracted_fields;
                let fieldsHtml = '<h6>Extracted Fields:</h6><div class="row">';

                Object.keys(fields).forEach(key => {
                    fieldsHtml += `
                        <div class="col-md-6 mb-2">
                            <strong>${key.replace('_', ' ').toUpperCase()}:</strong>
                            <input type="text" class="form-control" value="${fields[key]}" readonly>
                        </div>`;
                });

                fieldsHtml += '</div>';
                fieldsDiv.innerHTML = fieldsHtml;
            }

            const fullText = data.full_text || data.data?.full_text;
            if (fullText) {
                textDiv.innerHTML = `
                    <h6>Full Extracted Text:</h6>
                    <textarea class="form-control" rows="10" readonly>${fullText}</textarea>`;
            }

            resultsDiv.style.display = 'block';
        }

        function processImage() {
            const formData = new FormData(document.getElementById('ocrForm'));

            showLoading();

            axios.post('/ocr/process', formData)
                .then(response => {
                    hideLoading();
                    if (response.data.success) {
                        displayResults(response.data);
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                })
                .catch(error => {
                    hideLoading();
                    console.error('Error:', error);
                    alert('An error occurred: ' + (error.response?.data?.message || error.message));
                });
        }

        function extractFormData() {
            const formData = new FormData(document.getElementById('ocrForm'));

            showLoading();

            axios.post('/ocr/extract-form', formData)
                .then(response => {
                    hideLoading();
                    if (response.data.success) {
                        displayResults(response.data);
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                })
                .catch(error => {
                    hideLoading();
                    console.error('Error:', error);
                    alert('An error occurred: ' + (error.response?.data?.message || error.message));
                });
        }
    </script>
</body>
</html>

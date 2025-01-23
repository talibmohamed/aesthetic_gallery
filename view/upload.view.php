<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @font-face {
            font-family: 'KoPub Batang';
            src: url('/aesthetic_gallery/view/fonts/kopub-batang/KoPubBatang-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @import url('https://fonts.googleapis.com/css2?family=Playwrite+RO:wght@100..400&display=swap');

        body {
            font-family: Arial, sans-serif;
            background-color: #FFF9F6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
            overflow-y: auto;
        }

        .form-container {
            background-color: #FFF9F6;
            padding: 20px;
            width: 500px;
            border: 0;
            margin-top: 20px;
            overflow: hidden;
        }

        .form-title {
            font-family: Poppins, serif;
            font-size: 3em;
            color: #423E31;
            text-align: center;
        }

        .form-label {
            font-family: Poppins, sans-serif;
            font-size: 0.8em;
            color: #666666;
            display: block;
            margin-top: 10px;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background-color: #FFF9F6;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-sizing: border-box;
        }

        .form-radio {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .form-check {
            padding-top: 1px;
            display: inline-block;
            margin-right: 20px;
        }

        .form-check-input {
            margin-right: 5px;
        }

        .form-check-label {
            font-size: 1em;
        }

        .form-button {
            font-family: Poppins, sans-serif;
            padding: 15px;
            background-color: #c3bfbd;
            color: white;
            width: 100%;
            border-radius: 27px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
        }

        .form-button:hover {
            background-color: #423E31;
            transition: background-color 0.5s;
        }

        .form-consent {
            display: block;
            align-items: center;
            margin: 10px 0;
        }

        .additional-links {
            text-align: center;
            margin-top: 15px;
        }

        .link {
            text-decoration: none;
            color: #5C6BC0;
            font-size: 0.9em;
        }

        .form-error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }

        /* Style the custom file input button */
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-container input[type="file"] {
            font-size: 16px;
            padding: 10px;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .file-input-button {
            background-color: #c3bfbd;
            padding: 12px 20px;
            border-radius: 15px;
            border: none;
            color: white;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .file-input-button:hover {
            background-color: #423E31;
        }

        /* Image preview styling */
        .image-preview {
            margin-top: 15px;
            display: none;
            width: 100%;
            height: auto;
            border-radius: 15px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php require_once 'partial/header.php'; ?>

    <div class="main-container">
        <div class="form-container">
            <h1 class="form-title">Add New Artwork</h1>

            <!-- Display success message if exists -->
            <?php if (!empty($success)): ?>
                <p style="color: green;"><?= $success ?></p>
            <?php endif; ?>

            <!-- Display error messages if exists -->
            <?php if (!empty($errors)): ?>
                <ul class="form-error">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <label for="nom" class="form-label">Artwork Name:</label>
                <input type="text" name="nom" value="<?= isset($nom) ? $nom : '' ?>" class="form-input" required><br>

                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-input" required><?= isset($description) ? $description : '' ?></textarea><br>

                <label for="prix" class="form-label">Price:</label>
                <input type="number" name="prix" value="<?= isset($prix) ? $prix : '' ?>" step="0.01" class="form-input" required><br>

                <label for="mode_vente" class="form-label">Mode of Sale:</label><br>
                <div class="form-radio">
                    <div class="form-check">
                        <input type="radio" name="mode_vente" value="auction" <?= isset($mode_vente) && $mode_vente == 'auction' ? 'checked' : '' ?> class="form-check-input">
                        <label for="auction" class="form-check-label">Auction</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="mode_vente" value="direct_sale" <?= isset($mode_vente) && $mode_vente == 'direct_sale' ? 'checked' : '' ?> class="form-check-input">
                        <label for="direct_sale" class="form-check-label">Direct Sale (Salle)</label>
                    </div>
                </div>

                <label for="offre" class="form-label">Offer (if any):</label>
                <input type="number" name="offre" value="<?= isset($offre) ? $offre : '' ?>" step="0.01" class="form-input"><br>

                <label for="image" class="form-label">Artwork Image:</label>
                <div class="file-input-container">
                    <input type="file" name="image" accept="image/*" id="imageInput" class="form-input" required><br>
                    <button type="button" class="file-input-button">Choose File</button>
                </div>

                <!-- Image Preview -->
                <img id="imagePreview" class="image-preview" alt="Image Preview">

                <button type="submit" class="form-button">Add Artwork</button>
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
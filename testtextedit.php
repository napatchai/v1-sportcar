<?php include('./header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<body>
    <form action="./test.php" method="post">
        <textarea name="editor1"></textarea>
        <button type="submit">Submit</button>
    </form>
    <script src="./ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('editor1', {
        height: 300,
        // extraPlugins: 'youtube',

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        // filebrowserBrowseUrl: './upload',
        filebrowserUploadMethod: 'form',
        // filebrowserImageBrowseUrl: './upload',
        filebrowserUploadUrl: './admin/testupload.php'
        // filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',
        // removeButtons: 'PasteFromWord'
    });
    </script>
</body>

</html>
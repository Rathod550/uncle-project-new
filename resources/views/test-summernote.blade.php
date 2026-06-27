<!-- resources/views/test-summernote.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
</head>
<body>
  <textarea id="summernote"></textarea>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 150,
        placeholder: 'Type here...'
      });
    });
  </script>
</body>
</html>

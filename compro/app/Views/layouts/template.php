<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id'; ?>">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php if (isset($metaCategory)): ?>
        <title><?= $lang == 'id' ? $metaCategory['title_id'] : $metaCategory['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $metaCategory['meta_desc_id'] : $metaCategory['meta_desc_en']; ?>">
    <?php else: ?>
        <title><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $meta['meta_desc_id'] : $meta['meta_desc_en']; ?>">
    <?php endif; ?>

    <link rel="canonical" href="<?= isset($canonical) && !empty($canonical) ? $canonical : base_url() ?>">

    <!-- Favicons -->
    <link href=" <?= base_url('favicon.ico'); ?>" rel="icon">

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="<?= base_url('assets/style.css'); ?>" rel="stylesheet">
</head>

<body>
<?= $this->include('layouts/navbar'); ?>

<?= $this->renderSection('content'); ?>

<?= $this->include('layouts/footer'); ?>

<!-- Template Javascript -->
<script src="<?= base_url('assets/script.js'); ?>"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

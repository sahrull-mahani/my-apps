<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div id="map">
    <div id="coordinate" class="leaflet-control ms-1 fw-bold"></div>
</div>
<div class="input-group my-3">
    <span class="input-group-text" for="lat">Latitude</span>
    <input type="text" class="form-control" id="lat" placeholder="latitude...">
    <span class="input-group-text" for="long">Longitude</span>
    <input type="text" class="form-control" id="long" placeholder="longitude...">
</div>

<?= $this->endSection() ?>
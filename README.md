# UPLOAD HOSTING 000webhost
- Jangan gunakan `.env` file [gunakan Config\App.php] ganti baseurl
- Rubah Config\Boot\production.php
```javascript
define("ENVIRONMENT","development");
```

# Kalau menggunakan mpdf
```javascript
composer require mpdf/mpdf
```
- pastikan menggunakan code dibawah ini
```javascript
$this->response->setHeader('Content-Type', 'application/pdf');
$mpdf->Output('SPT.pdf', 'I');
```
`dari pada`
```javascript
return redirect()->to($mpdf->Output());
```

- menambahkan font baru ubah di `vendor\mpdf\mpdf\src\config\FontVariable.php`
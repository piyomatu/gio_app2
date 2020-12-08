

$file = "App\json\countryCode.json";

$json = file_get_contents($file);
$countryName = json_decode($json, true)['companyjp'];
$code = json_decode($json, true)['alpha2'];

console.log($countryName);



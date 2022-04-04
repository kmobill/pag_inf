<?php
//
//$googlespeechURL = "https://speech.googleapis.com/v1beta1/speech:syncrecognize?key=AIzaSyBbqfxix_ZaVlU5BhkEwoj0_fm0cI3TDY0";
//$filedata = file_get_contents("prueba.wav");
//
//$data = array(
//    "config" => array(
//        "encoding" => "LINEAR16",
//        "sampleRate" => 16000,
//        "languageCode" => "es-ES"
//    ),
//    "audio" => array(
//        "content" => base64_encode($filedata),
//    )
//);
//
//$data_string = json_encode($data);
//
//$ch = curl_init($googlespeechURL);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_URL, $googlespeechURL);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//    'Content-Type: application/json',
//    'Content-Length: ' . strlen($data_string))
//);
//curl_setopt($ch, CURLOPT_POST, true);
//$result = curl_exec($ch);
//$result_array = json_decode($result, true);
//echo $result;


# Includes the autoloader for libraries installed with composer
require __DIR__ . '\vendor\autoload.php';

# Imports the Google Cloud client library

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;

# The name of the audio file to transcribe
$gcsURI = "gs://cloud-samples-data/speech/brooklyn_bridge.raw";

# set string as audio content
$audio = (new RecognitionAudio())
    ->setUri($gcsURI);

# The audio file's encoding, sample rate and language
$config = new RecognitionConfig([
    'encoding' => AudioEncoding::LINEAR16,
    'sample_rate_hertz' => 16000,
    'language_code' => 'en-US'
]);

# Instantiates a client
$client = new SpeechClient();

# Detects speech in the audio file
$response = $client->recognize($config, $audio);

# Print most likely transcription
foreach ($response->getResults() as $result) {
    $alternatives = $result->getAlternatives();
    $mostLikely = $alternatives[0];
    $transcript = $mostLikely->getTranscript();
    printf('Transcript: %s' . PHP_EOL, $transcript);
}

$client->close();



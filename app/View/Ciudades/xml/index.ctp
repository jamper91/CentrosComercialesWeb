$xml = Xml::fromArray(array('response' => $ciudades));
echo $xml->asXML();
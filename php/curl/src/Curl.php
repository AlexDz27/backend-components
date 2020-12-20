<?php

namespace AlexDz27\Curl;

class Curl {
  private $ch;

  public $setBaseOptions = true;
  public $passedOptions;

  public function __construct($url = null, $queryParams = [])
  {
    if ($url !== null) {
      $this->setTargetUrl($url, $queryParams);
    }
  }

  public function getResponse()
  {
    $this->setOptions();
    return curl_exec($this->ch);
  }

  public function setTargetUrl($url, $queryParams = [])
  {
    if (!empty($queryParams)) {
      $url .= '?' . http_build_query($queryParams);
    }

    $this->ch = curl_init($url);
  }

  public function passOptions(array $options)
  {
    $this->passedOptions = $options;
  }

  public function setOptions()
  {
    $this->setBaseOptions();
    $this->setPassedOptions();
  }

  public function __destruct()
  {
    $this->destroy();
  }

  private function setBaseOptions()
  {
    if (!$this->setBaseOptions) {
      return;
    }

    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
  }

  private function setPassedOptions()
  {
    if ($this->passedOptions === null) {
      return;
    }

    foreach ($this->passedOptions as $option) {
      curl_setopt($this->ch, $option['name'], $option['value']);
    }
  }

  private function destroy()
  {
    if ($this->ch !== null) {
      curl_close($this->ch);
    }
  }
}


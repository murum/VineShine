<?php

class Tweet
{
	private $id;
	private $tweetID;
	private $videoURL;
	
	public function __construct( $tweetID, $videoURL = null, $id = null)
	{
		$this->id = $id;
		$this->tweetID = $tweetID;
		$this->videoURL = $videoURL;
	}
	
	public function getTweetID(){return $this->tweetID;}
	public function getVideoURL(){return $this->videourl;}
	
	public function get()
   	{
    	$data = get_object_vars($this);
		return $data;
   	}
	
	public function set( $field, $value )
   	{
    	$this->$field = $value;
   	}	
}
                             
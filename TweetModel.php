<?php
	class TweetModel
	{
		private $database = NULL;
		private static $table = "tweet";
	    public function __construct(Database $database)
	    {
    		$this->database = $database;
    	}
		//Funktion som lägger till ett producer objekt
        public function addTweet(Tweet $tweet)
        {
			$sql = "INSERT INTO ".self::$table." (id, tweetid, videourl)VALUES (?,?,?)";
			$stmt = $this->database->Prepare($sql);
			$vars = $producer->get();
			$stmt->bindValue(1, $vars['id'], \PDO::PARAM_INT);
	  		$stmt->bindValue(2, $vars['tweetid'], \PDO::PARAM_STR);
			$stmt->bindValue(3, $vars['videourl'], \PDO::PARAM_STR);
			if($this->database->runQuery($stmt))
			{
				return true;
			}
			return false;
        }
		
		//Funktion som skapar en producent
		public function createTweet($tweetID, $videoURL = null)
		{
			$sql = "INSERT INTO ".self::$table." (tweetid, videourl)VALUES (?,?)";
			$stmt = $this->database->Prepare($sql);
			$stmt->bindParam(1, $tweetID);
			$stmt->bindParam(2, $videoURL);
			if($ret = $this->database->runInsertQuery($stmt))
			{
				return $ret;
			}
			return false;
		}
		
		//Funktion som hämtar en specifik producent
		public function getTweet($id)
        {
        	$sql = "SELECT * FROM ".self::$table." WHERE id=?";
			$stmt = $this->database->Prepare($sql);
			$stmt->bindParam(1, $id);
			if($tweet = $this->database->getOne($stmt))
			{
				return $tweet;
			}
			return false;
		}
		
		public function getNineTweets($page = 1) {
			$tweetStart = ($page - 1) * 9;
			$tweetEnd = $page * 9;
			$sql = "SELECT * FROM ".self::$table." ORDER BY id desc LIMIT ".$tweetStart.", ".$tweetEnd."";
			$stmt = $this->database->Prepare($sql);
			if($tweetArray = $this->database->getAll($stmt))
			{
				return $tweetArray;
			}
			return false;
		}
		
		//Funktion som hämtar alla producenter
		public function getAllTweets()
		{
			$sql = "SELECT * FROM ".self::$table;
			$stmt = $this->database->Prepare($sql);
			if($tweetArray = $this->database->getAll($stmt))
			{
				return $tweetArray;
			}
			return false;
		}
		
		//Uppdatera delar eller all information om en producent.
		public function updateTweet(Tweet $tweet)
        {
        	//Utför en Update på tabellen user där villkor följs.
			$sql = "UPDATE ".self::$table." SET tweetid = ?, videourl = ? WHERE id = ?";
			$stmt = $this->database->Prepare($sql);
			$vars = $producer->get();
			$stmt->bindValue(1, $vars['tweetid'], \PDO::PARAM_STR);
			$stmt->bindValue(2, $vars['videourl'], \PDO::PARAM_STR);
			$stmt->bindValue(3, $vars['id'], \PDO::PARAM_INT);
			
			if($this->database->RunQuery($stmt))
			{
				return true;
			}
			return false;
            
        }
		
		//Funktion som tar bort ett tweet
		public function deleteTweet(Tweet $tweet)
        {
            //Utför en Delete på tabellen user där villkor följs.
			$sql = "DELETE FROM ".self::$table." WHERE id = ?";
			$stmt = $this->database->Prepare($sql);
			$id = $producer->getId();
		  	$stmt->bindParam( 1, $id);
			if($ret = $this->database->runQuery($stmt))
			{
				return true;
			}
			return false;
        }
	}
                                                                                                            
<?php

class FeedTest extends PHPUnit_Framework_TestCase
{
    protected $feed;

    public function setUp()
    {
        parent::setUp();

        $this->feed = new Roumen\Feed\Feed;
    }

	public function testFeedAttributes()
    {
        $this->feed->title = 'TestTitle';
        $this->feed->description = 'TestDescription';
        $this->feed->link = 'http://roumen.it/';
        $this->feed->logo = "http://roumen.it/favicon.png";
        $this->feed->icon = "http://roumen.it/favicon.png";
        $this->feed->pubdate = '2014-02-29 00:00:00';
        $this->feed->lang = 'en';

        $this->assertEquals('TestTitle', $this->feed->title);
        $this->assertEquals('TestDescription', $this->feed->description);
        $this->assertEquals('http://roumen.it/', $this->feed->link);
        $this->assertEquals("http://roumen.it/favicon.png", $this->feed->logo);
        $this->assertEquals("http://roumen.it/favicon.png", $this->feed->icon);
        $this->assertEquals('2014-02-29 00:00:00', $this->feed->pubdate);
        $this->assertEquals('en', $this->feed->lang);
    }

    public function testFeedAdd()
    {
    	$this->feed->add('TestTitle', 'TestAuthor', 'TestUrl', '2014-02-29 00:00:00', 'TestResume');

        $this->assertCount(1, $this->feed->items);

        $this->assertEquals('TestTitle', $this->feed->items[0]['title']);
        $this->assertEquals('TestAuthor', $this->feed->items[0]['author']);
        $this->assertEquals('TestUrl', $this->feed->items[0]['link']);
        $this->assertEquals('2014-02-29 00:00:00', $this->feed->items[0]['pubdate']);
        $this->assertEquals('TestResume', $this->feed->items[0]['description']);
    }

    public function testFeedRender()
    {
    	//
    }

}
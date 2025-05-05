<?php
class App extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
	    $this->retailModel = $this->model('Retails'); 
	}

	public function index() 
	{
	    redirect('user/index');
        
	}

    public function index2() 
	{
	    redirect('user/index');
        
	}

    public function index3() 
	{
	    redirect('retail/index');
        
	}

    public function index4() 
	{
	    redirect('retail/index');
        
	}

    


   


}
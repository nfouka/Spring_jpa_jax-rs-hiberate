package com.planetdev.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import com.planetdev.model.User;
import com.planetdev.model.UserDao;


@Controller
public class MainController {
	
	  @Autowired
	  private UserDao _userDao;

  @RequestMapping("/")
  @ResponseBody
  public String index() {
	  
	   for(int i = 0 ; i< 10 ; i++)
	  _userDao.save(new User("nadir.fouka@gmail.com", "nadir "+i ));
	  
    return "Proudly handcrafted by " + 
        "<a href='http://netgloo.com/en'>netgloo 2 </a> :)";
  }
  

}

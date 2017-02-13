package netgloo.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import netgloo.models.User;
import netgloo.models.UserDao;

@Controller
public class MainController {
	
	  @Autowired
	  private UserDao _userDao;

  @RequestMapping("/")
  @ResponseBody
  public String index() {
	  
	  
	  _userDao.save(new User("nadir.fouka@gmail.com", "nadir"));
	  
    return "Proudly handcrafted by " + 
        "<a href='http://netgloo.com/en'>netgloo 2 </a> :)";
  }

}

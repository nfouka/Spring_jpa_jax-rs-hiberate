package com.planetdev.rest;

import java.util.List;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.planetdev.StarterDemoApplication;
import com.planetdev.model.User;
import com.planetdev.model.UserDao; 


@org.springframework.web.bind.annotation.RestController
@RequestMapping("/rest")
public class RestController {
	
	  public static final Logger logger = LoggerFactory.getLogger(StarterDemoApplication.class);
	
	  @Autowired
	  private UserDao _userDao;

	  
	    @RequestMapping(value = "/user/", method = RequestMethod.GET)
	    public ResponseEntity<List<User>> listAllUsers() {
	        List<User> users = _userDao.getAll() ;
	        if (users.isEmpty()) {
	            return new ResponseEntity<List<User>>(HttpStatus.NO_CONTENT);
	        }
	        return new ResponseEntity<List<User>>(users, HttpStatus.OK);
	    }
	    
	    
	    // -------------------Retrieve Single User------------------------------------------
	    
	    @RequestMapping(value = "/user/{id}", method = RequestMethod.GET)
	    public String getUser(@PathVariable("id") long id) {
	        logger.info("Fetching User with id {}", id);
	        User user = _userDao.getById(id) ; 
	        logger.info("User with to string {} has been found.", user.toString());
	        return "hellos" ; 
	    }
	    

	    
	    
}

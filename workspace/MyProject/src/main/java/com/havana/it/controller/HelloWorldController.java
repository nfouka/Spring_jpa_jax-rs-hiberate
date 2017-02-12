package com.havana.it.controller;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

import com.havana.it.model.User;
import com.havana.it.model.UserDao;
import com.havana.it.tools.AppUserInterface;


@Controller
@RequestMapping("/hello")
public class HelloWorldController {
	
	@Autowired
	AppUserInterface appUserInterface ; 
	@Autowired
	UserDao userDao;
	
	@Autowired
	private SessionFactory sessionFactory;

    @RequestMapping(path="/user" , method=RequestMethod.GET)
    public @ResponseBody String sayHello() {
    	appUserInterface.sayHello();
    	List<User> li = userDao.getAll() ; 
    	Session session = sessionFactory.getCurrentSession() ; 
        return "hello" ; 
    }

}
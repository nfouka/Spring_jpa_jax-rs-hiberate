package com.planetdev.ressources;

import java.util.List;

import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import com.planetdev.StarterDemoApplication;
import com.planetdev.model.User;
import com.planetdev.model.UserDao;


@Path("/users")
@Produces(MediaType.APPLICATION_JSON)
@Consumes(MediaType.APPLICATION_JSON)
public class ProductsResource {
	
	  public static final Logger logger = LoggerFactory.getLogger(StarterDemoApplication.class);
		
	  @Autowired
	  private UserDao _userDao;

	
	@GET
	@Path("/{id}")
	public User getUserById(@PathParam("id") int id) {
		logger.info("user id "+id + " has been uploaded.");
		System.err.println(_userDao.getById(id).toString() );
		User User = _userDao.getById(id) ; 
		User u = new User() ; 
		u.setId(User.getId());
		u.setEmail(User.getEmail());
		u.setName(User.getName());
	    return u  ; 
	}
	
	@GET
	@Path("/all")
	public List<User> getAll() {
		List<User> list = _userDao.getAll() ; 
	    return list   ; 
	}
	
	

    
   
}
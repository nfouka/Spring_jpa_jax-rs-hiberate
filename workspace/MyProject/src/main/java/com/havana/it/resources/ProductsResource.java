package com.havana.it.resources;

import java.util.HashMap;
import java.util.List;

import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import org.springframework.beans.factory.annotation.Autowired;

import com.havana.it.model.Employee;
import com.havana.it.model.User;
import com.havana.it.model.UserDao;
import com.havana.it.model.UserRepository;
import com.havana.it.model.Users;
import com.havana.it.tools.AppUserInterface;

@Path("/products")
@Produces(MediaType.APPLICATION_JSON)
@Consumes(MediaType.APPLICATION_JSON)

public class ProductsResource {
	
	@Autowired
	AppUserInterface appUserInterface ; 
	
	@Autowired
	UserDao userDao;
	
	
	HashMap<String, String> map = new HashMap<>() ; 
	
	@Autowired
	private UserRepository userRepository;

	
	/*
	 *   public User getById(long id) {
    return entityManager.find(User.class, id);
  }
	 */
	
	@GET
	@Path("/load/{id}")
	public void loadUser(@PathParam("id") int id) {
	      for(int i = 0 ; i< id ; i++ ) {
	    	  userDao.create(
	    			  new User("nadir.fouka@dciss.org", "" + Math.random() )
	    			  );
	    	  
	      }
	   }
	
	@GET
	@Path("/{id}")
	public User getCustomer(@PathParam("id") int id) {
	      return userDao.getById(id) ; 
	   }

    @GET
    public List<User> getAll(){ 
    	    this.initializing();
    	    Users users = new Users("Nadir Fouka", "GRENOBLE", "wx", "sqsqsqs") ; 
    	    userRepository.save(users) ; 
    	    userRepository.flush();
    	    
    		appUserInterface.sayHello();
    		HashMap<String, Object> l = new HashMap<>() ; 
    		l.put("records", map ) ; 
    		List<User> li = userDao.getAll() ; 
  
    		for(User user:li){
    			System.out.println(user.toString());
    		}
    		
        	System.err.println(li);
    		return li  ; 
    }
    
    public void initializing(){
		for(int i = 0 ; i <  20 ; i++) {
		map.put(""+i, "Nadir Fouka " + Math.random() ) ; 
		}
    }

   
}
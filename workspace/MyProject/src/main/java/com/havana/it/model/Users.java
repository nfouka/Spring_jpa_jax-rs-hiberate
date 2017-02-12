package com.havana.it.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "Users_nadir")
public class Users {

	@Id 
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    public int id;

    public String username;

    public String firstname;

    public String lastname;

    public String password;

	public Users( String username, String firstname, String lastname, String password) {
		super();
		this.username = username;
		this.firstname = firstname;
		this.lastname = lastname;
		this.password = password;
	}

	public Users() {
		super();
		// TODO Auto-generated constructor stub
	}
    
    
}
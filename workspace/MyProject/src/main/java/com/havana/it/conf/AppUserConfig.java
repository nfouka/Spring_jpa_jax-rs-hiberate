package com.havana.it.conf;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import com.havana.it.tools.AppUser;
import com.havana.it.tools.AppUserInterface;

@Configuration
public class AppUserConfig {
	@Bean(name="appUser")
	public AppUserInterface getInstanceAppUser(){
			return new AppUser() ; 
	}
}

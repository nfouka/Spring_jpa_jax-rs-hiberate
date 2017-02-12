package com.havana.it;

import org.glassfish.jersey.servlet.ServletContainer;
import org.glassfish.jersey.servlet.ServletProperties;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

import com.havana.it.config.JerseyInitialization;
import org.springframework.boot.web.servlet.ServletRegistrationBean;


@SpringBootApplication(scanBasePackages={"com.havanait.it"})
@Configuration
@EnableAutoConfiguration
@ComponentScan
public class MyProjectApplication {

	public static void main(String[] args) {
		SpringApplication.run(MyProjectApplication.class, args);
	}
	
	  @Bean
	    public ServletRegistrationBean jerseyServlet() {
	        ServletRegistrationBean registration = new ServletRegistrationBean(new ServletContainer(), "/*");
	        registration.addInitParameter(ServletProperties.JAXRS_APPLICATION_CLASS, JerseyInitialization.class.getName());
	        return registration;
	    }
	    
}

package com.planetdev;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;


@SpringBootApplication(scanBasePackages={"com.websystique.springboot"})
@Configuration
@EnableAutoConfiguration
@ComponentScan
@PropertySource("classpath:application.properties")
public class StarterDemoApplication {
	
	 
	 

	public static void main(String[] args) {
		SpringApplication.run(StarterDemoApplication.class, args);
	}
}

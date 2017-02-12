package com.havana.it.model;

import javax.persistence.Table;
import javax.transaction.Transactional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
@Transactional
@Table(name = "Users")

public interface UserRepository extends JpaRepository<Users, String> {
}
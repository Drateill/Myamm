<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
 class User implements UserInterface
                        {
                            /**
                             * @ORM\Id()
                             * @ORM\GeneratedValue()
                             * @ORM\Column(type="integer")
                             */
                            private $id;
                        
                            /**
                             * @ORM\Column(type="string", length=255)
                             */
                            private $username;
                        
                            /**
                             * @ORM\Column(type="string", length=255)
                             */
                            private $password;
                        
                            /**
                             * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="users")
                             * @ORM\JoinColumn(nullable=false)
                             */
                            private $role;
                        
                            public $confirm_password;
               
                            
                            
                        
                            public function getId(): ?int
                            {
                                return $this->id;
                            }
                        
                            public function getUsername(): ?string
                            {
                                return $this->username;
                            }
                        
                            public function setUsername(string $username): self
                            {
                                $this->username = $username;
                        
                                return $this;
                            }
                        
                            public function getPassword(): ?string
                            {
                                return $this->password;
                            }
                        
                            public function setPassword(string $password): self
                            {
                                $this->password = $password;
                        
                                return $this;
                            }
                        
                            public function getRole(): ?Role
                            {
                                return $this->role;
                            }
                        
                            public function setRole(?Role $role): self
                            {
                                $this->role = $role;
                        
                                return $this;
                            }
                            public function eraseCredentials(){}
                        
                                public function getSalt(){}
                        
                                    public function getRoles(){
                                        return ["ROLE_USER"];
                                    }
      
                                    
                        }

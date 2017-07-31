<?php
    require_once("../../database/database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
		private $roundErr;
		private $fkErr;
		private $persons_id;
		private $courses_id;
        private $round_01;
		private $round_02;
		private $round_03;
		private $round_04;
		private $round_05;
		private $round_06;
		private $round_07;
		private $round_08;
		private $round_09;
		private $round_10;
		private $round_11;
		private $round_12;
		private $round_13;
		private $round_14;
		private $round_15;
		private $round_16;
		private $round_17;
		private $round_18;

        
        // CONSTRUCTOR
        function __construct($id, $persons_id, $courses_id, $round_01, $round_02, $round_03, $round_04, $round_05, $round_06, $round_07,$round_08,$round_09,$round_10,$round_11,$round_12,$round_13,$round_14,$round_15,$round_16,$round_17,$round_18) {
            $this->id     	  = $id;
			$this->persons_id = $persons_id;
			$this->courses_id  = $courses_id;
            $this->round_01   = $round_01;
            $this->round_02   = $round_02;
			$this->round_03   = $round_03;
			$this->round_04   = $round_04;
			$this->round_05   = $round_05;
			$this->round_06   = $round_06;
			$this->round_07   = $round_07;
			$this->round_08   = $round_08;
			$this->round_09   = $round_09;
			$this->round_10   = $round_10;
			$this->round_11   = $round_11;
			$this->round_12   = $round_12;
			$this->round_13   = $round_13;
			$this->round_14   = $round_14;
			$this->round_15   = $round_15;
			$this->round_16   = $round_16;
			$this->round_17   = $round_17;
			$this->round_18   = $round_18;

        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Rounds</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' href='https://csis.svsu.edu/~djbenedi/cis355/oo_crud'>Add Person</a>
							<a class='btn btn-primary' href='https://csis.svsu.edu/~djbenedi/cis355/oo_crud2'>Add Course</a>
							<br><br>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Add Round</a>
							<br><br>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
										<th>Person ID</th>
										<th>Course ID</th>
                                        <th>Hole 1</th>
                                        <th>Hole 2</th>
                                        <th>Hole 3</th>
										<th>Hole 4</th>
                                        <th>Hole 5</th>
										<th>Hole 6</th>
                                        <th>Hole 7</th>
                                        <th>Hole 8</th>
                                        <th>Hole 9</th>
										<th>Hole 10</th>
                                        <th>Hole 11</th>
                                        <th>Hole 12</th>
                                        <th>Hole 13</th>
										<th>Hole 14</th>
                                        <th>Hole 15</th>
                                        <th>Hole 16</th>
                                        <th>Hole 17</th>
										<th>Hole 18</th>
                                    </tr>
                                </thead>
                                <tbody>";     
							echo "<h3>Please enter '0' for holes that you have not played yet, or courses with only 9 holes. You
							can update the round as you play each hole. </h3>";
            foreach (Database::prepare('SELECT * FROM `tt_rounds`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['persons_id'] }</td>
                        <td>{$row['courses_id'] }</td>
                        <td>{$row['round_01'] }</td>
                        <td>{$row['round_02'] }</td>
                        <td>{$row['round_03'] }</td>
						<td>{$row['round_04'] }</td>
                        <td>{$row['round_05'] }</td>
                        <td>{$row['round_06'] }</td>
						<td>{$row['round_07'] }</td>
                        <td>{$row['round_08'] }</td>
                        <td>{$row['round_09'] }</td>
						<td>{$row['round_10'] }</td>
                        <td>{$row['round_11'] }</td>
                        <td>{$row['round_12'] }</td>
						<td>{$row['round_13'] }</td>
                        <td>{$row['round_14'] }</td>
                        <td>{$row['round_15'] }</td>
						<td>{$row['round_16'] }</td>
                        <td>{$row['round_17'] }</td>
                        <td>{$row['round_18'] }</td>
                        <td>
                            <button class='btn' onclick='personsRequest(\"displayRead\", {$row['id']})'>Read</button><br>
                            <button class='btn btn-success' onclick='personsRequest(\"displayUpdate\", {$row['id']})'>Update</button><br>
                            <button class='btn btn-danger' onclick='personsRequest(\"displayDelete\", {$row['id']})'>Delete</button>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div></div></div>";
        }
        
        // Display a form for adding a record to the database.
        public function displayCreateScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Create Round</h3>
                        </div>
					<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fkErr))?'':' error') ."'>Persons ID</label>
                                <div class='controls'>
                                    <input id='persons_id' type='text' required>
                                    <span class='help-inline'>{$this->fkErr}</span>
                                </div>
							</div>
												<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fkErr))?'':' error') ."'>Course ID</label>
                                <div class='controls'>
                                    <input id='courses_id' type='text' required>
                                    <span class='help-inline'>{$this->fkErr}</span>
                                </div>
							</div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 1</label>
                                <div class='controls'>
                                    <input id='round_01' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
							<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->RoundErr))?'':' error') ."'>Hole 2</label>
                                <div class='controls'>
                                    <input id='round_02' type='text' required>
                                    <span class='help-inline'>{$this->RoundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 3</label>
                                <div class='controls'>
                                    <input id='round_03' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 4</label>
                                <div class='controls'>
                                    <input id='round_04' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 5</label>
                                <div class='controls'>
                                    <input id='round_05' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 6</label>
                                <div class='controls'>
                                    <input id='round_06' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>  
							</div>								
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 7</label>
                                <div class='controls'>
                                    <input id='round_07' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 8</label>
                                <div class='controls'>
                                    <input id='round_08' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 9</label>
                                <div class='controls'>
                                    <input id='round_09' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>   
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 10</label>
                                <div class='controls'>
                                    <input id='round_10' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>  
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 11</label>
                                <div class='controls'>
                                    <input id='round_11' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div> 
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 12</label>
                                <div class='controls'>
                                    <input id='round_12' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>  
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 13</label>
                                <div class='controls'>
                                    <input id='round_13' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 14</label>
                                <div class='controls'>
                                    <input id='round_14' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div> 
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 15</label>
                                <div class='controls'>
                                    <input id='round_15' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div> 
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 16</label>
                                <div class='controls'>
                                    <input id='round_16' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>    
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 17</label>
                                <div class='controls'>
                                    <input id='round_17' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div> 
							</div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 18</label>
                                <div class='controls'>
                                    <input id='round_18' type='text' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
							</div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"createRecord\")'>Create</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Adds a record to the database.
        public function createRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "INSERT INTO tt_rounds (persons_id, courses_id, round_01, round_02, round_03, round_04, round_05, round_06, round_07, round_08, round_09, round_10, round_11, round_12, round_13, round_14, round_15, round_16, round_17, round_18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)",
                    array($persons_id, $courses_id, $this->round_01, $this->round_02, $this->round_03, $this->round_04,$this->round_05, $this->round_06, $this->round_07, $this->round_08,$this->round_09, $this->round_10, $this->round_11, $this->round_12,$this->round_13, $this->round_14, $this->round_15, $this->round_16, $this->round_17, $this->round_18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Round Details</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['name']}
                                    </label>
                                </div>
                            </div>

                            <div class='form-actions'>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Display a form for updating a record within the database.
        public function displayUpdateScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Person</h3>
                        </div>
						                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fkErr))?'':' error') ."'>Person ID</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['persons_id']}' required>
                                    <span class='help-inline'>{$this->fkErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->fkErr))?'':' error') ."'>Course ID</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['courses_id']}' required>
                                    <span class='help-inline'>{$this->fkErr}</span>
                                </div>
                            </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 1</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_01']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 2</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_02']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 3</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_03']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 4</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_04']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 5</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_05']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 6</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_06']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 7</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_07']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 8</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_08']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 9</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_09']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 10</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_10']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 11</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_11']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 12</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_12']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 13</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_13']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
							                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 14</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_14']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 15</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_15']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>                       
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 16</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_16']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>                        
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 17</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_17']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>                        
						<div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->roundErr))?'':' error') ."'>Hole 18</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['round_18']}' required>
                                    <span class='help-inline'>{$this->roundErr}</span>
                                </div>
                            </div>

                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"updateRecord\", {$this->id})'>Update</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Updates a record within the database.
        public function updateRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "UPDATE tt_rounds SET persons_id = ?, courses_id = ?, round_01 = ?, round_02 = ?, round_03 = ?, round_04 = ?, round_05 = ?, round_06 = ?, round_08 = ?, round_09 = ?, round_10 = ?, round_11 = ?, round_12 = ?, round_13 = ?, round_14 = ?, round_15 = ?, round_16 = ?, round_17 = ?, round_18 = ? WHERE id = ?",
                    array($this->persons_id, $this->courses_id, $this->round_01, $this->round_02, $this->round_03, $this->round_04, $this->round_05,$this->round_06, $this->round_07, $this->round_08, $this->round_09, $this->round_10, $this->round_11, $this->round_12,$this->round_13, $this->round_14, $this->round_15, $this->round_16, $this->round_17, $this->round_18, $this->id)
                );
                $this->displayListScreen();
            } else {
                $this->displayUpdateScreen();
            }
        }
        
        // Display a form for deleting a record from the database.
        public function displayDeleteScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Delete Person</h3>
                        </div>
                        <div class='form-horizontal'>
                            <p class='alert alert-error'>Are you sure you want to delete ?</p>
                            <div class='form-actions'>
                                <button id='submit' class='btn btn-danger' onClick='personsRequest(\"deleteRecord\", {$this->id});'>Yes</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Removes a record from the database.
        public function deleteRecord() {
            Database::prepare(
                "DELETE FROM tt_rounds WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Check for empty input.
			if (empty($this->persons_id)) { 
                $this->fkErr = "Please select an ID.";
                $valid = false; 
            }
			if (empty($this->courses_id)) { 
                $this->fkErr = "Please select an ID.";
                $valid = false; 
            }
            if (empty($this->round_01)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_02)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_03)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_04)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_05)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_06)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_07)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_08)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_09)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_10)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }			
            // Check for empty input.
            if (empty($this->round_11)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_12)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_13)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_14)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_15)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_16)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_17)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
            // Check for empty input.
            if (empty($this->round_18)) { 
                $this->roundErr = "Please enter a number.";
                $valid = false; 
            }
			print_r($valid);
            return $valid;
        }
    }
?>
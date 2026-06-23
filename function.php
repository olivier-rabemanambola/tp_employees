<?php
function dbconnect()
{
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (!$connect) {
            die('Erreur de connexion a la base de donnees : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}

function get_all_lines($sql)
{
    $req = mysqli_query(dbconnect(), $sql);
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) {
        $result[] = $line;
    }
    mysqli_free_result($req);
    return $result;
}


function get_one_line($sql)
{
    $req = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($req);
    mysqli_free_result($req);
    return $result;
}

function get_departments()
{
    $sql = "select * 
            from departments
            join dept_manager on departments.dept_no = dept_manager.dept_no
            join employees on dept_manager.emp_no = employees.emp_no
            where dept_manager.to_date = '9999-01-01'";
    return get_all_lines($sql);
}

function get_employees_by_department($dept_no)
{
    $sql = "select dept_emp.emp_no, employees.first_name, employees.last_name, departments.dept_name
            from dept_emp 
            join employees on dept_emp.emp_no = employees.emp_no
            join departments on dept_emp.dept_no = departments.dept_no
            where dept_emp.dept_no like '$dept_no'";
    return get_all_lines($sql);
}

function get_employee_profile($emp_no)
{
    $sql = "select employees.emp_no, employees.first_name, employees.last_name, employees.birth_date,employees.hire_date, employees.gender, dept_emp.dept_no, departments.dept_name
        from employees
        join dept_emp on employees.emp_no = dept_emp.emp_no
        join departments on dept_emp.dept_no = departments.dept_no
        where employees.emp_no = $emp_no";

    return get_one_line($sql);
}

function get_employee_salaries($emp_no)
{
    $sql = "select salary, from_date, to_date
        from salaries
        where emp_no = $emp_no";

    return get_all_lines($sql);
}

function get_employee_titles($emp_no)
{
    $sql = "select title, from_date, to_date
        from titles
        where emp_no = $emp_no";

    return get_all_lines($sql);
}

function researches_values($department_id, $name, $minimum_age, $maximum_age, $nb_pages)
{
    $sql = "SELECT dept_emp.dept_no,
                departments.dept_name,
                dept_emp.emp_no, 
                employees.first_name,
                employees.last_name,
                YEAR(NOW()) - YEAR(employees.birth_date) AS age,
                employees.gender
            FROM dept_emp
            JOIN departments 
            ON departments.dept_no = dept_emp.dept_no
            JOIN employees
            ON employees.emp_no = dept_emp.emp_no
            WHERE 1 = 1";

    if ($department_id != "all") {
        $sql = $sql." AND dept_emp.dept_no = '$department_id'";
    }

    if ($name != null && $name != "") {
        $sql = $sql." AND (employees.first_name LIKE '%$name%' OR employees.last_name LIKE '%$name%')";
    }

    if ($minimum_age !== null && $minimum_age !== "") {
        $sql = $sql." AND YEAR(NOW()) - YEAR(employees.birth_date) >= $minimum_age";
    }

    if ($maximum_age !== null && $maximum_age !== "") {
        $sql = $sql." AND YEAR(NOW()) - YEAR(employees.birth_date) <= $maximum_age";
    }

    $offset = $nb_pages * 20;

    $sql = $sql." LIMIT $offset, 20";

    return get_all_lines($sql) ;  
}
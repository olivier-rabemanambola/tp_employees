select * 
from departments
join dept_manager on departments.dept_no = dept_manager.dept_no
join employees on dept_manager.emp_no = employees.emp_no
where dept_manager.to_date = '9999-01-01';

select dept_emp.emp_no, employees.first_name, employees.last_name
from dept_emp 
join employees on dept_emp.emp_no = employees.emp_no
where dept_emp.dept_no like 'd001'

select employees.emp_no, employees.first_name, employees.last_name, employees.birth_date,employees.hire_date, employees.gender, dept_emp.dept_no, departments.dept_name
from employees
join dept_emp on employees.emp_no = dept_emp.emp_no
join departments on dept_emp.dept_no = departments.dept_no
where employees.emp_no = 10001;

select *
from salaries 
where emp_no = 10001;

select * 
from titles 
where emp_no = 10001;

SELECT 
    employees.gender AS gender, 
    titles.title AS title, 
    COUNT(DISTINCT employees.emp_no) AS nb_employees, -- DISTINCT évite les doublons si le titre a changé
    AVG(salaries.salary) AS avg_salary
FROM titles
JOIN employees ON titles.emp_no = employees.emp_no
JOIN salaries ON employees.emp_no = salaries.emp_no
WHERE salaries.to_date > NOW() -- Récupère uniquement le salaire ACTUEL de l'employé
  AND titles.to_date > NOW()   -- Récupère uniquement le poste ACTUEL de l'employé
GROUP BY titles.title, employees.gender;
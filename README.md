# Console Commands
This is a PHP script that runs as a console command. The script is implemented using standard PHP tools without using third party libraries. Input script accepts multiple values.

Scrypt has an array like:
```bash
$main_array = ['vasya', 'pupkin', 'apple', 23, 41, 55, 1, 2];
```

#### The script does some tasks:
- Make sure $main_array does not have a boolean true
- Make sure that the input parameters contain a boolean value true (if it
was introduced)
- Combine array and incoming parameters
- Determine what data is not in $main_array but is in the input
parameters
- Determine what data is in $main_array and in input parameters
- Convert all string values ​​in $main_array to uppercase characters
- Get an array of numbers from input parameters if numbers were entered
- Sort $main_array so that numbers come first
array elements


## Usage

- Open console
- enter this if you are using Windows:
```bash
script input parameters --command
```
![image](https://user-images.githubusercontent.com/45182546/157296334-90cca0f1-4695-4418-b7ef-6976e640499e.png)

- if your OS is not Windows then enter like this:
```bash
php main.php input parameters --command
```

### Commands available here
```bash
--f  # make sure if main array does not contains true       
--e  # check if incoming array contains true
--m  # merge arrays         
--d  # get difference of arrays
--i  # get equal elements of arrays
--u  # to uppercase main array string elements
--n  # get numeric elements of incoming array      
--s  # sort main array by numeric elements
```

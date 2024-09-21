### deploy with Docker
```
git clone https://github.com/NikolayUlyanov/svk_test <project-name>
```
```
cd <project-name>
```
```
composer update
```
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
```
sail up -d
```

PHPUnit tests
```
sail test
```


generate open api json (/storage/api-docs/api-docs.json)
```
sail artisan l5-swagger:generate
```

- Visit `http://localhost/api/shows`

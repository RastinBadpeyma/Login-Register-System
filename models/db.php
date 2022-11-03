 <?php

 class DB {
    protected $pdo = null;
    protected $host = 'localhost';
    protected $db = 'oop';
    protected $username = 'root';
    protected $password = '';
    protected $table;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}" , $this->username , $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    }

     public function create(array $data)
     {
         $fields = join("," , array_keys($data));
         $params = join("," , array_map(fn($item) => ":$item" , array_keys($data)));

         $statm = $this->pdo->prepare("insert into {$this->table} ({$fields}) values ({$params})");
         return $statm->execute($data);
     }
 }
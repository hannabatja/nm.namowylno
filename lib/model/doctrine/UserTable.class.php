<?php

/**
 * UserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('User');
    }
    
    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        return $q->fetchArray();
    }
    
    
    public function doFetchSelection($params = array())
    {
        $res = array();
        $rss = self::doFetchArray($params);
        foreach ($rss as $rs)
        {
          $res[$rs['id']] = $rs['email'];
        }
        return $res;
    }
  
    
    public function doFetchOne($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        return $q->fetchOne();
    }
    
  
    public function doCount($params = array())
    {
        $q = Doctrine_Query::create()->select('count(id)');
        $q = self::params($q, $params);
        return $q->count();
    }
    
    public function getPager($params = array(), $page=1)
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        $pager = new sfDoctrinePager('User', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    
    private function params($q, $params = array())
    {
        $q->from('User');
		
        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
            
        if(isset($params['idO']) && $params['idO'] != null)
            $q->andWhere('id <> ?', $params['idO']);
  
        if(isset($params['fullname']) && $params['fullname'])
            $q->andWhere('fullname like ?', '%'.$params['fullname'].'%');

        if(isset($params['email']) && $params['email'])
            $q->andWhere('email like ?', '%'.$params['email'].'%');
        
        if(isset($params['mobile']) && $params['mobile'])
            $q->andWhere('mobile like ?', '%'.$params['mobile'].'%');
            
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('fullname LIKE ? OR email LIKE ? OR mobile LIKE ? OR about LIKE ?', 
                array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));
  
        if(isset($params['isAdmin']) && in_array($params['isAdmin'], array('0', '1'))) 
            $q->andWhere('is_admin = ?', $params['isAdmin']);

        // is_active
        if(isset($params['isActive'])) {
            if($params['isActive'] != "all" && in_array($params['isActive'], array('0', '1'))) // all ued filter hiihgui
                $q->andWhere('is_active = ?', $params['isActive']);
        } else {
            $q->andWhere('is_active = ?', 1); // default
        }
        
        // group, offset, limit, order
        if(isset($params['groupBy']) && $params['groupBy'])
            $q->groupBy($params['groupBy']);        

        if(isset($params['offset']) && $params['offset'])
            $q->offset($params['offset']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
  
        $order = isset($params['orderBy']) ? $params['orderBy'] : 'created_at DESC';
        $q->orderBy($order);
  
        return $q;
    }
}
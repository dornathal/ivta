<?php

namespace Model\Map;

use Model\FreightGeneration;
use Model\FreightGenerationQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'freight_generations' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FreightGenerationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.FreightGenerationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'freight_generations';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\FreightGeneration';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.FreightGeneration';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the airport_id field
     */
    const COL_AIRPORT_ID = 'freight_generations.airport_id';

    /**
     * the column name for the next_generation_at field
     */
    const COL_NEXT_GENERATION_AT = 'freight_generations.next_generation_at';

    /**
     * the column name for the next_update_at field
     */
    const COL_NEXT_UPDATE_AT = 'freight_generations.next_update_at';

    /**
     * the column name for the capacity field
     */
    const COL_CAPACITY = 'freight_generations.capacity';

    /**
     * the column name for the every field
     */
    const COL_EVERY = 'freight_generations.every';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('AirportId', 'NextGenerationAt', 'NextUpdateAt', 'Capacity', 'Every', ),
        self::TYPE_CAMELNAME     => array('airportId', 'nextGenerationAt', 'nextUpdateAt', 'capacity', 'every', ),
        self::TYPE_COLNAME       => array(FreightGenerationTableMap::COL_AIRPORT_ID, FreightGenerationTableMap::COL_NEXT_GENERATION_AT, FreightGenerationTableMap::COL_NEXT_UPDATE_AT, FreightGenerationTableMap::COL_CAPACITY, FreightGenerationTableMap::COL_EVERY, ),
        self::TYPE_FIELDNAME     => array('airport_id', 'next_generation_at', 'next_update_at', 'capacity', 'every', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AirportId' => 0, 'NextGenerationAt' => 1, 'NextUpdateAt' => 2, 'Capacity' => 3, 'Every' => 4, ),
        self::TYPE_CAMELNAME     => array('airportId' => 0, 'nextGenerationAt' => 1, 'nextUpdateAt' => 2, 'capacity' => 3, 'every' => 4, ),
        self::TYPE_COLNAME       => array(FreightGenerationTableMap::COL_AIRPORT_ID => 0, FreightGenerationTableMap::COL_NEXT_GENERATION_AT => 1, FreightGenerationTableMap::COL_NEXT_UPDATE_AT => 2, FreightGenerationTableMap::COL_CAPACITY => 3, FreightGenerationTableMap::COL_EVERY => 4, ),
        self::TYPE_FIELDNAME     => array('airport_id' => 0, 'next_generation_at' => 1, 'next_update_at' => 2, 'capacity' => 3, 'every' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('freight_generations');
        $this->setPhpName('FreightGeneration');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\FreightGeneration');
        $this->setPackage('Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('airport_id', 'AirportId', 'INTEGER' , 'airports', 'id', true, null, null);
        $this->addColumn('next_generation_at', 'NextGenerationAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('next_update_at', 'NextUpdateAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('capacity', 'Capacity', 'INTEGER', true, null, 1);
        $this->addColumn('every', 'Every', 'INTEGER', true, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Airport', '\\Model\\Airport', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':airport_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AirportId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AirportId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('AirportId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? FreightGenerationTableMap::CLASS_DEFAULT : FreightGenerationTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (FreightGeneration object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FreightGenerationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FreightGenerationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FreightGenerationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FreightGenerationTableMap::OM_CLASS;
            /** @var FreightGeneration $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FreightGenerationTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = FreightGenerationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FreightGenerationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var FreightGeneration $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FreightGenerationTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(FreightGenerationTableMap::COL_AIRPORT_ID);
            $criteria->addSelectColumn(FreightGenerationTableMap::COL_NEXT_GENERATION_AT);
            $criteria->addSelectColumn(FreightGenerationTableMap::COL_NEXT_UPDATE_AT);
            $criteria->addSelectColumn(FreightGenerationTableMap::COL_CAPACITY);
            $criteria->addSelectColumn(FreightGenerationTableMap::COL_EVERY);
        } else {
            $criteria->addSelectColumn($alias . '.airport_id');
            $criteria->addSelectColumn($alias . '.next_generation_at');
            $criteria->addSelectColumn($alias . '.next_update_at');
            $criteria->addSelectColumn($alias . '.capacity');
            $criteria->addSelectColumn($alias . '.every');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(FreightGenerationTableMap::DATABASE_NAME)->getTable(FreightGenerationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FreightGenerationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FreightGenerationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FreightGenerationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a FreightGeneration or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or FreightGeneration object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreightGenerationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\FreightGeneration) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FreightGenerationTableMap::DATABASE_NAME);
            $criteria->add(FreightGenerationTableMap::COL_AIRPORT_ID, (array) $values, Criteria::IN);
        }

        $query = FreightGenerationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FreightGenerationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FreightGenerationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the freight_generations table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FreightGenerationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a FreightGeneration or Criteria object.
     *
     * @param mixed               $criteria Criteria or FreightGeneration object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreightGenerationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from FreightGeneration object
        }


        // Set the correct dbName
        $query = FreightGenerationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FreightGenerationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FreightGenerationTableMap::buildTableMap();

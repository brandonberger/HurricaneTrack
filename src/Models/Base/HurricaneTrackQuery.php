<?php

namespace Models\Base;

use \Exception;
use \PDO;
use Models\HurricaneTrack as ChildHurricaneTrack;
use Models\HurricaneTrackQuery as ChildHurricaneTrackQuery;
use Models\Map\HurricaneTrackTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hurricane_track' table.
 *
 *
 *
 * @method     ChildHurricaneTrackQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHurricaneTrackQuery orderByHurricaneId($order = Criteria::ASC) Order by the hurricane_id column
 * @method     ChildHurricaneTrackQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildHurricaneTrackQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     ChildHurricaneTrackQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     ChildHurricaneTrackQuery orderByPressure($order = Criteria::ASC) Order by the pressure column
 * @method     ChildHurricaneTrackQuery orderByMaxSustainedWind($order = Criteria::ASC) Order by the max_sustained_wind column
 * @method     ChildHurricaneTrackQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildHurricaneTrackQuery groupById() Group by the id column
 * @method     ChildHurricaneTrackQuery groupByHurricaneId() Group by the hurricane_id column
 * @method     ChildHurricaneTrackQuery groupByDate() Group by the date column
 * @method     ChildHurricaneTrackQuery groupByLatitude() Group by the latitude column
 * @method     ChildHurricaneTrackQuery groupByLongitude() Group by the longitude column
 * @method     ChildHurricaneTrackQuery groupByPressure() Group by the pressure column
 * @method     ChildHurricaneTrackQuery groupByMaxSustainedWind() Group by the max_sustained_wind column
 * @method     ChildHurricaneTrackQuery groupByStatus() Group by the status column
 *
 * @method     ChildHurricaneTrackQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHurricaneTrackQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHurricaneTrackQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHurricaneTrackQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHurricaneTrackQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHurricaneTrackQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHurricaneTrackQuery leftJoinHurricanes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hurricanes relation
 * @method     ChildHurricaneTrackQuery rightJoinHurricanes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hurricanes relation
 * @method     ChildHurricaneTrackQuery innerJoinHurricanes($relationAlias = null) Adds a INNER JOIN clause to the query using the Hurricanes relation
 *
 * @method     ChildHurricaneTrackQuery joinWithHurricanes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Hurricanes relation
 *
 * @method     ChildHurricaneTrackQuery leftJoinWithHurricanes() Adds a LEFT JOIN clause and with to the query using the Hurricanes relation
 * @method     ChildHurricaneTrackQuery rightJoinWithHurricanes() Adds a RIGHT JOIN clause and with to the query using the Hurricanes relation
 * @method     ChildHurricaneTrackQuery innerJoinWithHurricanes() Adds a INNER JOIN clause and with to the query using the Hurricanes relation
 *
 * @method     \Models\HurricanesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHurricaneTrack findOne(ConnectionInterface $con = null) Return the first ChildHurricaneTrack matching the query
 * @method     ChildHurricaneTrack findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHurricaneTrack matching the query, or a new ChildHurricaneTrack object populated from the query conditions when no match is found
 *
 * @method     ChildHurricaneTrack findOneById(int $id) Return the first ChildHurricaneTrack filtered by the id column
 * @method     ChildHurricaneTrack findOneByHurricaneId(int $hurricane_id) Return the first ChildHurricaneTrack filtered by the hurricane_id column
 * @method     ChildHurricaneTrack findOneByDate(string $date) Return the first ChildHurricaneTrack filtered by the date column
 * @method     ChildHurricaneTrack findOneByLatitude(string $latitude) Return the first ChildHurricaneTrack filtered by the latitude column
 * @method     ChildHurricaneTrack findOneByLongitude(string $longitude) Return the first ChildHurricaneTrack filtered by the longitude column
 * @method     ChildHurricaneTrack findOneByPressure(int $pressure) Return the first ChildHurricaneTrack filtered by the pressure column
 * @method     ChildHurricaneTrack findOneByMaxSustainedWind(int $max_sustained_wind) Return the first ChildHurricaneTrack filtered by the max_sustained_wind column
 * @method     ChildHurricaneTrack findOneByStatus(string $status) Return the first ChildHurricaneTrack filtered by the status column *

 * @method     ChildHurricaneTrack requirePk($key, ConnectionInterface $con = null) Return the ChildHurricaneTrack by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOne(ConnectionInterface $con = null) Return the first ChildHurricaneTrack matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHurricaneTrack requireOneById(int $id) Return the first ChildHurricaneTrack filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByHurricaneId(int $hurricane_id) Return the first ChildHurricaneTrack filtered by the hurricane_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByDate(string $date) Return the first ChildHurricaneTrack filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByLatitude(string $latitude) Return the first ChildHurricaneTrack filtered by the latitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByLongitude(string $longitude) Return the first ChildHurricaneTrack filtered by the longitude column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByPressure(int $pressure) Return the first ChildHurricaneTrack filtered by the pressure column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByMaxSustainedWind(int $max_sustained_wind) Return the first ChildHurricaneTrack filtered by the max_sustained_wind column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHurricaneTrack requireOneByStatus(string $status) Return the first ChildHurricaneTrack filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHurricaneTrack[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHurricaneTrack objects based on current ModelCriteria
 * @method     ChildHurricaneTrack[]|ObjectCollection findById(int $id) Return ChildHurricaneTrack objects filtered by the id column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByHurricaneId(int $hurricane_id) Return ChildHurricaneTrack objects filtered by the hurricane_id column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByDate(string $date) Return ChildHurricaneTrack objects filtered by the date column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByLatitude(string $latitude) Return ChildHurricaneTrack objects filtered by the latitude column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByLongitude(string $longitude) Return ChildHurricaneTrack objects filtered by the longitude column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByPressure(int $pressure) Return ChildHurricaneTrack objects filtered by the pressure column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByMaxSustainedWind(int $max_sustained_wind) Return ChildHurricaneTrack objects filtered by the max_sustained_wind column
 * @method     ChildHurricaneTrack[]|ObjectCollection findByStatus(string $status) Return ChildHurricaneTrack objects filtered by the status column
 * @method     ChildHurricaneTrack[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HurricaneTrackQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Models\Base\HurricaneTrackQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Models\\HurricaneTrack', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHurricaneTrackQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHurricaneTrackQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHurricaneTrackQuery) {
            return $criteria;
        }
        $query = new ChildHurricaneTrackQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildHurricaneTrack|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HurricaneTrackTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HurricaneTrackTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHurricaneTrack A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, hurricane_id, date, latitude, longitude, pressure, max_sustained_wind, status FROM hurricane_track WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildHurricaneTrack $obj */
            $obj = new ChildHurricaneTrack();
            $obj->hydrate($row);
            HurricaneTrackTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildHurricaneTrack|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the hurricane_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHurricaneId(1234); // WHERE hurricane_id = 1234
     * $query->filterByHurricaneId(array(12, 34)); // WHERE hurricane_id IN (12, 34)
     * $query->filterByHurricaneId(array('min' => 12)); // WHERE hurricane_id > 12
     * </code>
     *
     * @see       filterByHurricanes()
     *
     * @param     mixed $hurricaneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByHurricaneId($hurricaneId = null, $comparison = null)
    {
        if (is_array($hurricaneId)) {
            $useMinMax = false;
            if (isset($hurricaneId['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_HURRICANE_ID, $hurricaneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hurricaneId['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_HURRICANE_ID, $hurricaneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_HURRICANE_ID, $hurricaneId, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the latitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLatitude(1234); // WHERE latitude = 1234
     * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
     * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
     * </code>
     *
     * @param     mixed $latitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByLatitude($latitude = null, $comparison = null)
    {
        if (is_array($latitude)) {
            $useMinMax = false;
            if (isset($latitude['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($latitude['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_LATITUDE, $latitude, $comparison);
    }

    /**
     * Filter the query on the longitude column
     *
     * Example usage:
     * <code>
     * $query->filterByLongitude(1234); // WHERE longitude = 1234
     * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
     * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
     * </code>
     *
     * @param     mixed $longitude The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByLongitude($longitude = null, $comparison = null)
    {
        if (is_array($longitude)) {
            $useMinMax = false;
            if (isset($longitude['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($longitude['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_LONGITUDE, $longitude, $comparison);
    }

    /**
     * Filter the query on the pressure column
     *
     * Example usage:
     * <code>
     * $query->filterByPressure(1234); // WHERE pressure = 1234
     * $query->filterByPressure(array(12, 34)); // WHERE pressure IN (12, 34)
     * $query->filterByPressure(array('min' => 12)); // WHERE pressure > 12
     * </code>
     *
     * @param     mixed $pressure The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByPressure($pressure = null, $comparison = null)
    {
        if (is_array($pressure)) {
            $useMinMax = false;
            if (isset($pressure['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_PRESSURE, $pressure['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pressure['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_PRESSURE, $pressure['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_PRESSURE, $pressure, $comparison);
    }

    /**
     * Filter the query on the max_sustained_wind column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxSustainedWind(1234); // WHERE max_sustained_wind = 1234
     * $query->filterByMaxSustainedWind(array(12, 34)); // WHERE max_sustained_wind IN (12, 34)
     * $query->filterByMaxSustainedWind(array('min' => 12)); // WHERE max_sustained_wind > 12
     * </code>
     *
     * @param     mixed $maxSustainedWind The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByMaxSustainedWind($maxSustainedWind = null, $comparison = null)
    {
        if (is_array($maxSustainedWind)) {
            $useMinMax = false;
            if (isset($maxSustainedWind['min'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_MAX_SUSTAINED_WIND, $maxSustainedWind['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxSustainedWind['max'])) {
                $this->addUsingAlias(HurricaneTrackTableMap::COL_MAX_SUSTAINED_WIND, $maxSustainedWind['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_MAX_SUSTAINED_WIND, $maxSustainedWind, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HurricaneTrackTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Models\Hurricanes object
     *
     * @param \Models\Hurricanes|ObjectCollection $hurricanes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function filterByHurricanes($hurricanes, $comparison = null)
    {
        if ($hurricanes instanceof \Models\Hurricanes) {
            return $this
                ->addUsingAlias(HurricaneTrackTableMap::COL_HURRICANE_ID, $hurricanes->getId(), $comparison);
        } elseif ($hurricanes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HurricaneTrackTableMap::COL_HURRICANE_ID, $hurricanes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByHurricanes() only accepts arguments of type \Models\Hurricanes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hurricanes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function joinHurricanes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hurricanes');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Hurricanes');
        }

        return $this;
    }

    /**
     * Use the Hurricanes relation Hurricanes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Models\HurricanesQuery A secondary query class using the current class as primary query
     */
    public function useHurricanesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHurricanes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hurricanes', '\Models\HurricanesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHurricaneTrack $hurricaneTrack Object to remove from the list of results
     *
     * @return $this|ChildHurricaneTrackQuery The current query, for fluid interface
     */
    public function prune($hurricaneTrack = null)
    {
        if ($hurricaneTrack) {
            $this->addUsingAlias(HurricaneTrackTableMap::COL_ID, $hurricaneTrack->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hurricane_track table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HurricaneTrackTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HurricaneTrackTableMap::clearInstancePool();
            HurricaneTrackTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HurricaneTrackTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HurricaneTrackTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HurricaneTrackTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HurricaneTrackTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HurricaneTrackQuery

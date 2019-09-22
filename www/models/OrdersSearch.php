<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'month', 'day', 'created_at', 'age', 'qty', 'recipient_age', 'recipient_for'], 'integer'],
            [['first_name', 'last_name', 'address_1', 'city', 'phone', 'email', 'interests', 'recipient_first_name', 'recipient_last_name', 'recipient_address_1', 'recipient_city', 'recipient_interests', 'time', 'shipping_status', 'payment_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
              'defaultOrder' => [
                'created_at' => SORT_DESC
              ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'month' => $this->month,
            'day' => $this->day,
            'created_at' => $this->created_at,
            'age' => $this->age,
            'qty' => $this->qty,
            'recipient_age' => $this->recipient_age,
            'recipient_for' => $this->recipient_for,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'address_1', $this->address_1])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'interests', $this->interests])
            ->andFilterWhere(['like', 'recipient_first_name', $this->recipient_first_name])
            ->andFilterWhere(['like', 'recipient_last_name', $this->recipient_last_name])
            ->andFilterWhere(['like', 'recipient_address_1', $this->recipient_address_1])
            ->andFilterWhere(['like', 'recipient_city', $this->recipient_city])
            ->andFilterWhere(['like', 'recipient_interests', $this->recipient_interests])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'shipping_status', $this->shipping_status])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }
}

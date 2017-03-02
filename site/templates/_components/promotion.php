<?php namespace DS\Components;

/**
 * The Promotion component displays the active promotion
 * who's end date is >= the current date.
 *
 * @return string Rendered HTML of the component.
 */

function promotion()
{
  $promotion = \ProcessWire\wire('pages')->get('template=promotion, end_date>=today');

  return
    ($promotion->id == false ? '' :
      \DS\header(['class'=>'bb bt bw1 mb4 mh3 mh4-l', 'style'=>"background: url({$promotion->image->url}) center right no-repeat; border-color:{$promotion->color}; color:{$promotion->color};"],
        \DS\div(['class'=>'bg-near-black pr3 pr4-l pt3 pb3 w-75 w-80-m'],
          \DS\dl(['class'=>'dt-ns ma0 mb1 w-100'],
            \DS\dt(['class'=>'dtc-ns f3-ns f4 fw5 ma0 w-50-m w-60-l'], $promotion->title).
            \DS\dd(['class'=>'dn dtc-ns f7 ma0 pa0 tr-ns v-mid w-40-l w-50-m'], "Sale ends {$promotion->end_date} EST")
          ).
          \DS\dl(['class'=>'dt ma0 w-100'],
            \DS\dt(['class'=>'dn dtc-ns f5-l f7 fw4 lh-copy ma0 mb1 ttu v-btm w-60-ns'], $promotion->subtitle).
            \DS\dd(['class'=>'dtc-l f7 fw4 lh-copy ma0 pa0 pl3-l tr-ns ttu w-40-l'], "{$promotion->new_student_discount}% off <span class=\"dn di-l\">for</span> new students<br>{$promotion->current_student_discount}% off <span class=\"dn di-l\">for</span> current students")
          )
        )
      )
    );
};
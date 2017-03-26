<?php
namespace DS;
use DS\Components as cmp;

$user_id      = $users->get("template=user, user_handle=cdakroub");
$connections  = $users->find("template=user, user_connections={$user_id}, sort=user_connections.created");
$speaker_icon = $pages->get('template=image, title=Dubspot Speaker')->image->url;

print(

  div(['data-pw-id' => 'content'],
    div(['class' => 'center2 mv5 mw6'],
      h2(['class' => 'f3 b mb4'], "Connections for {$user_id->user_handle}").

      $connections->each(function($user) use ($connections, $pages, $speaker_icon) {
        $photo = empty($user->user_profile_photo) === false ? $user->user_profile_photo->url : $speaker_icon;

        return
          \DS\article(['class' => 'dt h4-ns h4 link w-100 '.($connections->last() == $user ? '' : 'bb b--gray'), 'id'=>"user-{$user->user_handle}"],
            \DS\div(['class' => 'bg-ds-gray dtc overflow-hidden w3'],
              \DS\div(['class' => 'cover grow-large h-100','style'=>"background:  url({$photo}) center center no-repeat;"])
            ).
            \DS\div(['class' => 'dtc pl3 pv2 v-top'],
              \DS\h1(['class' => 'f6 f5-ns fw6 lh-title mv0'], $user->user_name).
              \DS\a(['class' => 'f6 fw4 dib ds-gray mt0 mb2 text-link', 'href' => '#'], "@{$user->user_handle}").
              \DS\p(['class' => 'f6 fw4 ds-gray lh-copy ma0'], $user->user_bio)
            ).
            \DS\div(['class' => 'dtc pr0-l pr3 pv2 v-mid w3'],
              \DS\form(['class' => 'w-100 tr'],
                ($connections->has($user)
                  ? \DS\button(['class' => 'bg-black button-reset bn dib dim ds-yellow h2 pa0 w2 pointer tc ttu v-mid', 'title' => 'Remove', 'type' => 'submit'],
                      svg_image('images/icon-minus.svg')
                    )
                  : \DS\button(['class' => 'bg-black button-reset bn dib dim ds-yellow  h2 pa0 w2 pointer black tc ttu v-mid', 'title' => 'Add', 'type' => 'submit'],
                      svg_image('images/icon-plus.svg')
                    )
                )
              )
            )
          );
      })
    )
  )

);
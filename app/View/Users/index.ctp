<h3><?php echo $pageTitle; ?></h3>
<h3></h3>
<?php echo $this->Html->link('Logout', 'http://bookingproject/hotels/index', array('class' => 'logout-button')); ?>
<h3></h3>
<?php echo $this->Html->link('Add New Property', 'http://bookingproject/hotels/add?owner_id=' .$owner_id, array('class' => 'add-button')); ?> 
<h1></h1>
<h1>List of Hotels</h1> 

<table> 
       <thead> 
               <tr> 
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action </th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($hotels)){ ?>
                <?php foreach ($hotels as $h => $hotel): ?>
                    <tr>
                       <td><?php echo h($hotel['Hotel']['name']); ?></td>
                       <td><?php echo h($hotel['Hotel']['address_name']); ?></td>
                      <td><?php echo h($hotel['Hotel']['phone_number']); ?></td>       
                      <td><?php echo h($hotel['Hotel']['email']); ?></td>
                        <td> <?php echo $this->Html->link('Edit','http://bookingproject/hotels/edit?id='.$hotel['Hotel']['id'].'&owner='.$hotel['Hotel']['owner_id']); ?>
                        <?php echo $this->Html->link('Delete','http://bookingproject/hotels/delete?id='.$hotel['Hotel']['id'].'&owner='.$hotel['Hotel']['owner_id'],array('confirm' => 'Are you sure you want to delete this hotel?')); ?>
                        <?php echo $this->Html->link('Reservations','http://bookingproject/hotels/viewReservations?id='.$hotel['Hotel']['id']); ?>

                      </td>
                  </tr>
               <?php endforeach; }?> 
       </tbody>
</table>

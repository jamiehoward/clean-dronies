# Tournament style milestones

1. All dronies receive one vote
2. All dronies receive two votes
3. All dronies receive three votes

Once a dronie receives one vote, either negative or positive, it is removed from the list.

Once all dronies have received one vote, the next round begins.

## Vote schema

vote : {
    "winner_id": "dronie_id",
    "loser_id": "dronie_id",
    "attribute": "attribute_name",
}

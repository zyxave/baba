#include <bits/stdc++.h>
using namespace std;
#define pb push_back
#define mp make_pair
#define fi first
#define se second

typedef long long ll;
typedef pair<ll, ll> ip;

const ll INF = 1000000000000000;
vector <ip> adj[200];
priority_queue < ip, vector<ip>, greater<ip> > pq;
ll T, N, P, Q, R, dist[200], x, y, z;

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	while (T--) {
		cin >> N >> P >> Q >> R;
		for (ll i = 1; i <= 100; i++) {
			adj[i].clear();
			dist[i] = INF;
		}
		for (ll i = 1; i <= N; i++) {
			cin >> x >> y >> z;
			adj[x].pb(mp(z, y));
			adj[y].pb(mp(z, x));
		}
		
		dist[P] = 0;
		pq.push(mp(0, P));
		
		while (!pq.empty()) {
			ip now = pq.top();
			pq.pop();
			
			ll titik = now.se;
			ll jarak = now.fi;
			
			if (dist[titik] < jarak) continue;
			for (ll i = 0; i < adj[titik].size(); i++) {
				ll nxt = adj[titik][i].se;
				ll cost = adj[titik][i].fi;
				if (dist[nxt] > jarak + cost) {
					dist[nxt] = jarak + cost;
					pq.push(mp(dist[nxt], nxt));
				}
			}
		}
		
		if (dist[Q] <= R) cout << dist[Q] << "\n";
		else cout << "Andi tidak bisa mengikuti seminar.\n";
	}
}

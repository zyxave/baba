#include<bits/stdc++.h>

using namespace std;
#define ll unsigned long long

ll modexp(ll n, ll m, ll p){
	ll res = 1;
	while(m){
		if(m & 1) res *= e % p;
		n = n * n % p;
		m >>= 1;
	}
	return res;
}

int main(){
	ll tc; scanf("llu", &tc);
	while(tc--){
		ll num; scanf("%llu", &num);
		ll ans = modexp(2 * num - 2, 2, 1e9 + 7);
		ans = (ans + n) % (1e9 + 7);
		printf("%llu\n", ans);
	}
}

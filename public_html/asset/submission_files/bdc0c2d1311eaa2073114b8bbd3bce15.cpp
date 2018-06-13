#include<bits/stdc++.h>
#define ll long long
using namespace std;
set<int>ver,hor,ph,pv;
set<int>::iterator lo,hi;
int t,n,m,q,x,y;
int ch[100003],cv[100003];
int main(){
	cin>>t;
	while(t--){
			memset(ch,0,sizeof ch);
			memset(cv,0,sizeof cv);
		cin>>n>>m>>q;
		hor.clear();
		ver.clear();
		ver.insert(1);
		ver.insert(n);
		hor.insert(1);
		hor.insert(m);
		pv.clear();
		ph.clear();
		ph.insert(m-1);
		ch[m-1]++;
		pv.insert(n-1);
		cv[n-1]++;
		while(q--){
			cin>>x>>y;
			lo=hor.lower_bound(y);
			int kanan,kiri;
			if(*lo!=y){
				kanan=*lo;
			lo--;
			kiri=*lo;
			ch[kanan-kiri]--;
			if(ch[kanan-kiri]==0)ph.erase(kanan-kiri);
			ph.insert(y-kiri);
			ch[y-kiri]++;
			ph.insert(kanan-y);
			ch[kanan-y]++;
			hor.insert(y);
			}
			//////
			lo=ver.lower_bound(x);
			if(*lo!=x){
				kanan=*lo;
			lo--;
			kiri=*lo;
			cv[kanan-kiri]--;
			if(cv[kanan-kiri]==0)pv.erase(kanan-kiri);
			pv.insert(x-kiri);
			cv[x-kiri]++;
			pv.insert(kanan-x);
			cv[kanan-x]++;
			ver.insert(x);
				lo=ph.end();
			lo--;
			hi=pv.end();
			hi--;
			}
		//	cout<<(*lo)*(*hi)<<' '<<*lo<<' '<<*hi<<endl;
		}
		lo=ph.end();
		lo--;
		hi=pv.end();
		hi--;
		int bx=hor.size();
		int by=ver.size();
		bx--,by--;
		ll jaw=((ll)bx*(ll)by);
		cout<<jaw<<" ";
		lo=ph.begin();
		hi=pv.begin();
		bx=*lo,by=*hi;
		jaw=((ll)bx*(ll)by);
		cout<<jaw<<" ";
		lo=ph.end();
		lo--;
		hi=pv.end();
		hi--;
		bx=*lo,by=*hi;
		jaw=((ll)bx*(ll)by);
		cout<<jaw;
		cout<<endl;
	}
}

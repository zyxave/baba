#include <iostream>

using namespace std;

int main() {
	long t,i,s,p,a,m,r;
	cin >> t;
	
	for (int i = 1; i < (t+1); i++) {
		cin>>p;
		cin>>a;
		cin>>m;
		cin>>r;
		s = 0;
		while (r > p) {
			r = r - p;
		
			if (p >= m) {
				p = p - a;
			}
			s = s + 1;
		}
		cout<<s<<endl;
	}
}
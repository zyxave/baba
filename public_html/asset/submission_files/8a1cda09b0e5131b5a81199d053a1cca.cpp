#include<bits/stdc++.h>
using namespace std;
int book[1000003];
int main()
{
	ios_base::sync_with_stdio(0); cout.tie(0); cin.tie(0);
	int n;
	cin >> n;
	while(n--)
	{
		int a, b;
		cin >> a >> b;
		book[a] = b;
	}
	int q; cin >> q;
	while(q--)
	{
		int x;
		cin >> x;
		cout << book[x] << "\n";
	}
}


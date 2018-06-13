#include <bits/stdc++.h>

using namespace std;

bool pairCompare(const std::pair<long, long>& firstElem, const std::pair<long, long>& secondElem)
{
	return firstElem.first < secondElem.first;
}

void f()
{
	long n;
	cin>>n;
	string dump;
	getline(cin,dump);
	vector<string> s;
	vector< pair<long,long> > i;
	long m=n;
	pair<long,long> x[n];
	while(m--)
	{
		string tmp;
		getline(cin,tmp);
		pair<long,long> tap;
		tap.second=m;
		long h=0;
		while(h<tmp.length())
		{
			tap.first+=tmp[h]-'0';
			h++;
		}
		s.push_back(tmp);
		i.push_back(tap);
	}
	sort(i.begin(),i.end(),pairCompare);
	while(n--)
	{/*
		string data = s[n];
	    stringstream sstream(data);
	    string output;
	    while(sstream.good())
	    {
	        bitset<8> bits;
	        sstream >> bits;
	        char c = char(bits.to_ulong());
	        output += c;
	    }*/
		cout<<s[i[n].second]<<endl;
	}
}

int main()
{
	long t;
	cin>>t;
	while(t--)
		f();
}
